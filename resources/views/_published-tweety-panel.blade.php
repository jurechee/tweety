
<form method="POST" action="/index">
       @csrf

<textarea name="body" id="" cols="30" rows="5"></textarea>

       <br>
       
       @error('body')
       <p>{{ $message }}</p>
   @enderror
       
       <button>Tweet-a-roo</button>
       
       <hr>
</form>