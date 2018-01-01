   <div class="form-group col-sm-6">
     <label for="menuname">Name</label>
     <input type="text" value="{{ $record->name }}" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter page name">
     <small id="nameHelp" class="form-text text-muted">menu name.</small>
   </div>
   @if ($errors->has('name'))
   <div class="error alert alert-danger">
     {{ $errors->first('name') }}
   </div>
   @endif

   <div class="form-group col-sm-6">
     <label for="display_name">Display Name</label>
     <input type="text" value="{{ $record->display_name }}" name="display_name" class="form-control" id="display_name" placeholder="display_name">
   </div>
   @if ($errors->has('display_name'))
   <div class="error alert alert-danger">
     {{ $errors->first('display_name') }}
   </div>
   @endif
       <div class="form-group col-sm-6">
           <label for="title">URL</label>
           <input type="text" name="url"  value="{{ $record->url }}" class="form-control" id="url" placeholder="url">
       </div>
       @if ($errors->has('url'))
       <div class="error alert alert-danger">
           {{ $errors->first('url') }}
       </div>
       @endif
   <div class="form-group col-sm-6">
     <label for="description">Description</label>
     <textarea class="form-control" name="description" id="description" rows="3" placeholder="description">
        {{ $record->description }}
     </textarea>
   </div>
   @if ($errors->has('description'))
   <div class="error alert alert-danger">
     {{ $errors->first('description') }}
   </div>
   @endif

    <?php
    if($record->published == "1"){
      $checked = "checked";
    }else{
      $checked = "";
    } ?>
   <div class="form-check">
     <label class="form-check-label">
       <input type="checkbox" {{ $checked }} name="published" class="form-check-input">
       Publish
     </label>
   </div>

   <button type="submit" name="update" class="btn btn-primary">UPDATE</button>

 {{-- @if(count($errors))
   <div class="form-group">
     <div class="alert alert-danger">
       <ul>
         @foreach($errors->all() as $error )
        <li>{{ $error }}</li>
        @endforeach
       </ul>
     </div>
   </div>
   @endif --}}
