<!DOCTYPE html>
<html lang="en" ng-app="demo">
<head>
    <meta charset="UTF-8">
    <title>Drag &amp; Drop Lists for angular.js</title>

    <!-- jQuery is not required -->
    <!-- <script src="//code.jquery.com/jquery-1.11.0.min.js"></script> -->

    <!-- angular is the only dependency! -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
    <script src="/js/angular-drag-and-drop-lists.js"></script>

    <!-- Stuff that is only required in this demo (no need to copy) -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">

    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-route.min.js"></script>
    <script src="/js/simple.js"></script>

</head>
<body ng-controller="SimpleDemoController">

    <div class="container-fluid">

        <h1>Demo: Simple Lists</h1>
        
        <div class="simpleDemo row">
        
            <div class="col-md-8">
                <div class="row">
                    <div ng-repeat="(listName, list) in models.lists" class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">List {{listName}}</h3>
                            </div>
                            <div class="panel-body">
                                <!-- The dnd-list directive allows to drop elements into it.
                                     The dropped data will be added to the referenced list -->
                                <ul dnd-list="list" class="list-group">
                                    <!-- The dnd-draggable directive makes an element draggable and will
                                         transfer the object that was assigned to it. If an element was
                                         dragged away, you have to remove it from the original list
                                         yourself using the dnd-moved attribute -->
                                    <li class="list-group-item"
                                        ng-repeat="item in list"
                                        dnd-draggable="item"
                                        dnd-moved="list.splice($index, 1)"
                                        dnd-effect-allowed="move"
                                        dnd-selected="models.selected = item"
                                        ng-class="{'selected': models.selected === item}"
                                        >
                                        {{item.label}}
                                    </li>
                                </ul>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Generated Model</h3>
                    </div>
                    <div class="panel-body">
                        <pre class="code">{{modelAsJson}}</pre>
                    </div>
                </div>
            </div>
        
        </div>


    </div>

</body>
