<script src="<?= BASE_URL;?>js/angular.min.js"></script>

<script>
var phonecatApp = angular.module('axioma', []);

phonecatApp.controller('workers', ['$scope', function($scope) {
	$scope.workers = [		
		<?php foreach ($this->workers as $w) : ?>
		{id:<?=$w["id"];?>,name:'<?=$w["name"];?>', lastname:'<?=$w["lastname"];?>', position:'<?=$w["position"];?>', description:'<?=$w["description"];?>', wage:'<?=$w["wage"];?>'},
		<?php endforeach ; ?>
	];
	$scope.predicate = 'name';
}]);



</script>
<div ng-app="axioma">
	<div ng-controller="workers">
		<a id="base_url" data-base-url="<?=BASE_URL;?>" href="<?=BASE_URL;?>workers/add/">Add new worker</a>
		<table class="workersTable centered">
			<tr>
				<th><a href="" ng-click="predicate = 'name'; reverse=!reverse">Name</a></th>
				<th><a href="" ng-click="predicate = 'lastname'; reverse=!reverse">Lastname</a></th>
				<th><a href="" ng-click="predicate = 'position'; reverse=!reverse">position</a></th>
				<th><a href="" ng-click="predicate = 'description'; reverse=!reverse">Description</a></th>
				<th><a href="" ng-click="predicate = 'wage'; reverse=!reverse">Wage</a></th>
				<th></th>
			</tr>
			<tr ng-repeat="worker in workers | orderBy:predicate:reverse">
				<td>{{worker.name}}</td>
				<td>{{worker.lastname}}</td>
				<td>{{worker.position}}</td>
				<td>{{worker.description}}</td>
				<td>{{worker.wage}}Ls</td>
				<td class="editdelete">
					<a href="<?=BASE_URL;?>workers/edit/{{worker.id}}">EDIT</a>&nbsp;
				<a href="#" onclick="del(this);" data-id="{{worker.id}}">DELETE</a>
				</td>
			</tr>
		</table>
	</div>
</div>



<script src="<?=BASE_URL;?>js/workersAll.js"></script>
