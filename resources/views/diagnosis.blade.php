@extends('layouts.master')

@section('title')
    Formal Diagnosis Machine
@endsection

@section('content')
    <form method='GET' action='/diagnosis-process'>

        <label for='age'>Please enter your age in years</label>
        <input type='text' name='age' id ='age' value = '{{ old('age')}}'>

        <br />

        <label for='day'>What is your body made out of?</label>
        <select name='body' id='day'>
            <option value=' '>Choose one...</option>
            <option value='steel' {{ (old('body')=='steel') ? 'selected' : '' }}>Steel</option>
            <option value='flesh' {{ (old('body')=='flesh') ? 'selected' : '' }}>Flesh</option>
            <option value='noclue' {{ (old('body')=='noclue') ? 'selected' : '' }}>I don't know</option>
        </select>

        <!-- Trick to makes it so that if no checkboxes are selected, we still receive form data -->
        <input type='hidden' name='submitted' value='1'>

        <fieldset class='checkboxes'>
            <legend>Select which of the following you possess</legend>
            <ul class='checkboxes'>
                <li>
                    <label><input type='checkbox'
                                  name='spirit[]'
                                  value='heart'
                                  @if (old('spirit')) {{ (in_array('heart', old('spirit'))) ? 'checked' : '' }} @endif> A pulse</label>
                </li>
                <li>
                    <label><input type='checkbox'
                                  name='spirit[]'
                                  value='soul'
                                  @if (old('spirit')) {{ (in_array('soul', old('spirit'))) ? 'checked' : '' }} @endif> Emotions</label>
                </li>
                <li>
                    <label><input type='checkbox'
                                  name='spirit[]'
                                  value='brain'
                                  @if (old('spirit')) {{ (in_array('brain', old('spirit'))) ? 'checked' : '' }} @endif> Complex thought</label>
                </li>
            </ul>
        </fieldset>

        <input type='submit' value='Diagnose' class='btn btn-primary btn-sm'>
    </form>
    @if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li class='error'>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    @if($diagnosisResults)
    <p>
        You are {{$diagnosisResults}}.
    </p>
    @endif
@endsection