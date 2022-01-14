

<a  href="{{ route('categories.edit' , $id )}}" class="btn btn-info"> <i class="far fa-edit"></i> </a>


<form action="{{ route('categories.destroy' , $id )}}" class="d-inline" method="POST">
    @csrf 
    @method('DELETE')
    <button type="submit" class="btn btn-danger"> <i class="far fa-trash-alt"></i> </button>
</form>



