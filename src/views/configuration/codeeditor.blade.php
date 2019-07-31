<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Code Editor | {{env("APP_NAME")}}</title>
    <style type="text/css" media="screen">
        body {
            overflow: hidden;
        }

        #editor {
            margin: 0;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }
    </style>
</head>
<body>

<div class="container" id="editor">
    {{$filecontent}}
</div>
<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
<button id="save" style="position: fixed" value="Save">Save</button>
{{--<script src="{{asset("vendor/autoinstall/js/codehighlighter/rainbow-custom.min.js")}}"></script>--}}
<script src="{{asset("vendor/autoinstall/ace/src-min-noconflict/ace.js")}}"></script>
<script src="{{asset("vendor/autoinstall/ace/src-min-noconflict/ext-beautify.js")}}"></script>
<script src="{{asset("vendor/autoinstall/ace/src-min-noconflict/ext-language_tools.js")}}"></script>
<script src="{{asset("vendor/autoinstall/ace/src-min-noconflict/ext-themelist.js")}}"></script>
<script src="https://cloud9ide.github.io/emmet-core/emmet.js"></script>
{{--<script src="https://github.com/ccampbell/rainbow/blob/master/src/language/php.js"></script>--}}
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    ace.require("ace/ext/language_tools");
    var beautify = ace.require("ace/ext/beautify");
    ace.require("ace/ext/emmet");
    ace.require("ace/ext/themelist");


    var editor = ace.edit("editor");
    editor.setFontSize("16px");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/php");
    editor.session.setTabSize(2);
    editor.session.setUseWrapMode(true);;
    beautify.beautify(editor.session);

    //console.log(editor.getValue())

    editor.setOptions({
        enableBasicAutocompletion: true,
        enableSnippets: true,
        enableLiveAutocompletion: true,
        enableEmmet: true
    })


    // add command to lazy-load keybinding_menu extension
    editor.commands.addCommand({
        name: "showKeyboardShortcuts",
        bindKey: {win: "Ctrl-Alt-h", mac: "Command-Alt-h"},
        exec: function(editor) {
            ace.config.loadModule("ace/ext/keybinding_menu", function(module) {
                module.init(editor);
                editor.showKeyboardShortcuts()
            })
        }
    })
    editor.commands.addCommand({
        name: "save",
        bindKey: {
            win: "Ctrl-S",
            mac: "Command-S",
            sender: "editor|cli"
        },
        exec: function() {
            var content = editor.getValue();
            $.ajax({
                url: "{{url("confige_file_store")}}",
                method: "POST",
                data: {
                    contents: content,
                    filename: '{{$filename}}'
                }
            }).done(function (data) {
                console.log(data)
            })
        }
    })
    editor.execCommand("showKeyboardShortcuts")

    saveFile = function() {
        var contents = editor.getSession().getValue();


    };

</script>
</body>
</html>
