<html>
    <head>
        <title>{$pageTitle}</title>
        <link rel="stylesheet" href="{$templateWebPath}css/main.css" type="text/css"/>
        <script type="text/javascript" src="/js/query-3.3.1.min.js"></script>
        <!--<script type="text/javascript" src="/js/underscore.js"></script> -->
        <script type="text/javascript" src= 
        "https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore.js"> 
        </script> 
        <script type="text/javascript" src="/js/main.js"></script>
    </head>
    
<body>
    <script type="text/javascript" >
       var tpl = _.template("<h1>Some text: <%= foo %></h1>");
    </script>    
<div id="header">
    <h1>My shop - Интернет магазин</h1>            
</div>
    
    {include file='leftColumn.tpl'}
        
<div id="centerColumn">
