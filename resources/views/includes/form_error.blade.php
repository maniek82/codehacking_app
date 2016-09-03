 @if(count($errors) >0)
 <div class="row">

     <div class="col-sm-4">
      
     
         <div class="alert alert-danger">
             <ul>
                 @foreach($errors->all() as $error)
                 <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
      </div>
 </div>     
    @endif