@extends('layouts.layouts3')

@section('text')
 <script type="text/javascript">
        tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",

        plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
         
        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,
         
        // Example content CSS (should be your site CSS)
        content_css : "css/content.css",
         
        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "lists/template_list.js",
        external_link_list_url : "lists/link_list.js",
        external_image_list_url : "lists/image_list.js",
        media_external_list_url : "lists/media_list.js",
         
        // Style formats
        style_formats : [
        {title : 'Bold text', inline : 'b'},
        {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
        {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
        {title : 'Example 1', inline : 'span', classes : 'example1'},
        {title : 'Example 2', inline : 'span', classes : 'example2'},
        {title : 'Table styles'},
        {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
        ],
         
        // Replace values for the template plugin
        template_replace_values : {
        username : "Some User",
        staffid : "991234"
        }
        });
    </script>
@endsection

@section('content')
    <section class="content">
        <div class="row ">
            <div class="col-12">
                <form class="form-horizontal" method="POST" action="/materi/{{ $action }}{{($action!='edit')? '/'.$materi['id'] : ''}}{{($action!='edit')? '/'.$materi['matakuliah_id'] : ''}}{{($action!='edit')? '/'.$materi['kelas_id'] : ''}}{{($action!='edit')? '/'.$materi['angkatan_id'] : ''}}" enctype="multipart/form-data">
                    {{ csrf_field() }}                    
                        <h4 class="page-head-line">Form Edit Materi</h4>                   
                    <div class="modal-body">
                        @if($action=="delete")
                            <div class="alert alert-danger">
                                <strong>Perhatian!</strong> Menekan tombol delete akan menghapus data.
                            </div>
                        @endif
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Judul</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="file_title" placeholder="Judul" value="{{ ($action!='edit') ? $materi['file_title'] : '' }}">
                                <input type="hidden" class="form-control" name="id" value="{{ ($action!='edit') ? $materi['id'] : '' }}">
                            </div>
                        </div>                      
                       
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Konten</label>
                            <div class="col-sm-8">
                                <textarea name="konten" style="width: 753px; height: 140px;"><?php echo $materi['konten'];?></textarea>
                            </div>
                        </div>                    
                    <div class="modal-footer">
                        <a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
                        <button type="submit" class="btn {{($action!='delete')? 'btn-success' : 'btn-danger' }} pull-right" >{{ ucwords($action) }}</button>
                    </div>
                </form>
            </div>
        </div>  
    </section>
@endsection
