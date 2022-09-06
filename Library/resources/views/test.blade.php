
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<h1>Ajax ile ilgili işlemler</h1>

<input id="cat_name" type="text" placeholder="kategori ismi gir">

<button onclick="ekle();"> tabloya ajax ile veri ekle </button>

<script>
    function ekle(){

        var cat_name=$("#cat_name").val();
        $.ajax({

            url:"{{ route('kategori.ekle') }}",
            data:{
                kategori: cat_name,
                _token: '{{csrf_token()}}'
            },
            success:function(data){
               if(data.result){
                loadTable(data.kategori_id,cat_name);
               }
            },
            type:"post"

        });
    }
    function loadTable(id,cat_name){
        var tbl=document.getElementById("catTbl");
        var satir=document.createElement("tr");
        var sutun1=document.createElement("td");
        var sutun2=document.createElement("td");

        sutun1.textContent=id;
        sutun2.textContent=cat_name;

        satir.append(sutun1);
        satir.append(sutun2);

        tbl.append(satir);
    }
</script>

<table>
    <thead>


        <tr>
            <td>kategori id</td>
            <td>katergori adı</td>
            
        </tr>
    </thead>
    <tbody id="catTbl">
        @foreach ($kategoriler as $val )

            <tr>
                
                <td>{{ $val->id }}</td>
             <td>{{ $val->category_name }}</td>

            </tr>    
        @endforeach
    </tbody>
</table>
