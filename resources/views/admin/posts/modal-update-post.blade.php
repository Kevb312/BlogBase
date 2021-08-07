<head>
    <!--<link rel="stylesheet" href="{{asset('Tiny/style.css')}}" />
    <script type="text/javascript" src="{{asset('Tiny/tinyeditor.js')}}"></script> -->

    
</head>

<div class="modal fade" id="modal-update-post-{{$post->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Editar Post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

        <form action="{{route('admin.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
        	{{csrf_field()}}
            <div class="modal-body">
                <div class="form-group">
                	<label for="title">Titulo</label>
                	<input type="text" name="title" class="form-control" id="title" value="{{$post->title}}" required>

                    <label for="category_id">Categoría</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">-- Elegir categoría --</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"> {{$category->name}}</option>
                            @endforeach
                        </select>

                    <label for="content">Contenido</label>
                    <textarea name="content" class="form-control" id="content" cols="30" rows="10" required> {{$post->content}}</textarea>

                    <label for="author">Autor</label>
                    <input type="text" name="author" class="form-control" id="author" value="{{$post->author}}" required>

                    <label for="featured">Imagen principal</label>
                    <input type="file" name="featured" class="form-control" id="featured" >
                </div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">Guardar</button>
            </div>
        </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script type="text/javascript">

    /*
new TINY.editor.edit('editor',{
    id:'content',
    width:584,
    height:175,
    cssclass:'te',
    controlclass:'tecontrol',
    rowclass:'teheader',
    dividerclass:'tedivider',
    controls:['bold','italic','underline','strikethrough','|','subscript','superscript','|',
              'orderedlist','unorderedlist','|','outdent','indent','|','leftalign',
              'centeralign','rightalign','blockjustify','|','unformat','|','undo','redo','n',
              'font','size','style','|','image','hr','link','unlink','|','cut','copy','paste','print'],
    footer:true,
    fonts:['Verdana','Arial','Georgia','Trebuchet MS'],
    xhtml:true,
    cssfile:'style.css',
    bodyid:'editor',
    footerclass:'tefooter',
    toggle:{text:'show source',activetext:'show wysiwyg',cssclass:'toggle'},
    resize:{cssclass:'resize'}
});
*/


</script>