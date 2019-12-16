<!DOCTYPE HTML>
<html>
<head>
    <!-- when using the mode "code", it's important to specify charset utf-8 -->
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">

    <!--link href="jsoneditor/dist/jsoneditor.min.css" rel="stylesheet" type="text/css"-->
    <link href="{{asset('css/jsoneditor.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('js/jsoneditor.min.js')}}"></script>
    <!--script src="jsoneditor/dist/jsoneditor.min.js"></script-->
</head>
<body>
    
    <div id="jsoneditor1" style="width: 45vw; height: 95vh;display:inline-block;margin-right: 10p"></div>
    <div id="jsoneditor2" style="width: 45vw; height: 95vh;display:inline-block"></div>
    <form action="{{action('JsonController@updateJson',[$id])}}" id="UpdaterForm" method="POST">
        @csrf
        <input name="body" id="JsonBody" hidden type="text">
        <input name="id" hidden type="text" value="{{$id}}">
        <button onclick="updateJson()">updateJson</button>
    </form>
    <script>
        // create the editor
        // const container = document.getElementById("jsoneditor")
        // const options = {}
        let editor1 = new JSONEditor(document.querySelector('#jsoneditor1'), {modes:["code","tree"],mode:"code",onChangeText: function (jsonString) {editor2.updateText(jsonString)}})
        let editor2 = new JSONEditor(document.querySelector('#jsoneditor2'), {modes:["code","tree"],mode:"tree",onChangeText: function (jsonString) {editor1.updateText(jsonString)}})

        // set json
        // const initialJson = {
        //     "Array": [1, 2, 3],
        //     "Boolean": true,
        //     "Null": null,
        //     "Number": 123,
        //     "Object": {"a": "b", "c": "d"},
        //     "String": "Hello World"
        // }

        let initialJson = {!!\App\Json::where('id',$id)->first()->body!!};
        editor1.set(initialJson)
        editor2.set(initialJson)

        // get json
        //const updatedJson = editor.get()

        function updateJson(){
            document.querySelector("#JsonBody").value=JSON.stringify(editor1.get());
            console.log(JSON.stringify(editor1.get()));
            //document.querySelector("#updaterForm").submit();
        }
    </script>


</body>
</html>
