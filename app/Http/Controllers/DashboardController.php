<?php

namespace App\Http\Controllers;

use App\Field;
use App\Student;
use App\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $domains = $this->getDomain();
        $states = $this->getState();
        $fields = $this->getField();
        $studentcount = Student::count();
        $universities = University::select('name_en')->get();  

        
        
        $gender = Student::groupBy('student_gender')
                            ->select('student_gender', DB::raw('count(*) as gender_total'))
                            ->pluck('gender_total', 'student_gender');
        
        $major = Student::select('major', DB::raw('count(*) as major_total'))
                          ->groupBy('major')
                          ->pluck('major_total', 'major');
       
        $year = Student::select('applied_year', DB::raw('count(*) as year_total'))
                         ->groupBy('applied_year')
                         ->pluck('year_total', 'applied_year');
       
        $state = Student::select('student_birth_state', DB::raw('count(*) as state_total'))
                         ->groupBy('student_birth_state')
                         ->pluck('state_total', 'student_birth_state');
        
        return view('dashboard', compact('domains', 'studentcount', 'gender', 'universities', 'fields', 'state', 'states', 'year', 'major'));
    }

    public function filter(Request $request)
    {
        $uni_id = $request->uni_id;
        $domains = $this->getDomain();
        $states = $this->getState();
        $fields = $this->getField();
        $studentcount = Student::where('university_id', $uni_id)->count();
        $universities = University::select('name_en')->get();  
        $gender = Student::groupBy('student_gender')
                            ->select('student_gender', DB::raw('count(*) as gender_total'))
                            ->where('university_id', $uni_id)
                            ->pluck('gender_total', 'student_gender');
        $year = Student::select('applied_year', DB::raw('count(*) as year_total'))
                            ->where('university_id', $uni_id)
                            ->groupBy('applied_year')
                            ->pluck('year_total', 'applied_year');
        $state = Student::select('student_birth_state', DB::raw('count(*) as state_total'))
                            ->where('university_id', $uni_id)
                            ->groupBy('student_birth_state')
                            ->pluck('state_total', 'student_birth_state');
        
        return view('dashboard', compact('gender', 'state', 'states', 'fields', 'domains', 'studentcount', 'universities', 'year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getDomain()
    {
        // $domain = config('authentication');
        $domain = University::all();
        return $domain;
    }

    public function getField()
    {
        $fields = University::groupBy('field_id')
                            ->select('f.name_en', DB::raw('count(*) as field_total'))
                            ->join('fields as f', 'f.id', 'universities.field_id' )
                            ->get();
        return $fields;
    }

    public function getState()
    {
        $state = Student::select('student_birth_state', DB::raw('count(*) as state_total'))
        ->groupBy('student_birth_state')
        ->pluck('state_total', 'student_birth_state');
        $states['mm-tn'] = $state['တနင်္သာရီတိုင်းဒေသကြီး'];
        $states['mm-5760'] = 1;
        $states['mm-mo'] = $state['မွန်ပြည်နယ်'];
        $states['mm-ra'] = $state['ရခိုင်ပြည်နယ်'];
        $states['mm-ay']=  $state['ဧရာဝတီတိုင်းဒေသကြီး'];
        $states['mm-ra'] = $state['ရခိုင်ပြည်နယ်'];
        $states['mm-ch'] = $state['ချင်းပြည်နယ်'];
        $states['mm-mg'] = $state['မကွေးတိုင်းဒေသကြီး'];
        $states['mm-sh'] = $state['ရှမ်းပြည်နယ်'];
        $states['mm-kh'] = $state['ကယားပြည်နယ်'];
        $states['mm-kn'] = $state['ကရင်ပြည်နယ်'];
        $states['mm-kc'] = $state['ကချင်ပြည်နယ်'];
        $states['mm-sa'] = $state['စစ်ကိုင်းတိုင်းဒေသကြီး'];
        $states['mm-ba'] = $state['ပဲခူးတိုင်းဒေသကြီး'];
        $states['mm-md'] = $state['မန္တလေးတိုင်းဒေသကြီး'];
        $states['mm-ya'] = $state['ရန်ကုန်တိုင်းဒေသကြီး'];

        return $states;
    }

    public function selectDomain($uni)
    {
        $domains = config('authentication');
        $selected_domain = $domains[$uni];
        
        return $selected_domain;
    }

}
