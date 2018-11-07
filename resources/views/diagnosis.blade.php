<!doctype html>
<html lang='en'>
<head>
    <title>Formal Diagnosis Machine</title>
</head>
<body>
    <h1> Formal Diagnosis Machine </h1>
    <form method='GET' action='/diagnosis-process'>

        <label for='age'>Please enter your age in years</label>
        <input type='text' name='age' id ='age' value = '{{ old('age')}}'>

        <br />

        <label for='day'>What is your body made out of?</label>
        <select name='body' id='day'>
            <option value=' '>Choose one...</option>
            <option value='steel'>Steel</option>
            <option value='flesh'>Flesh</option>
            <option value='noclue'>I don't know</option>
        </select>

        <!-- Trick to makes it so that if no checkboxes are selected, we still receive form data -->
        <input type='hidden' name='submitted' value='1'>

        <fieldset class='checkboxes'>
            <legend>Select which of the following you possess</legend>
            <ul class='checkboxes'>
                <li>
                    <label><input type='checkbox'
                                  name='spirit[]'
                                  value='heart'> A pulse</label>
                </li>
                <li>
                    <label><input type='checkbox'
                                  name='spirit[]'
                                  value='soul'> Emotions</label>
                </li>
                <li>
                    <label><input type='checkbox'
                                  name='spirit[]'
                                  value='brain'> Complex thought</label>
                </li>
            </ul>
        </fieldset>

        <input type='submit' value='Diagnose' class='btn btn-primary btn-sm'>
    </form>
    @if(count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    @if($diagnosisResults)
    <p>
        You are {{$diagnosisResults}}.
    </p>
    @endif
</body>
</html>