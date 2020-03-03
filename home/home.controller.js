app.controller('homeController',function ($scope, $rootScope, $http, $location, $anchorScroll, $css){	
	$css.removeAll();
	$css.add([
		'templates/lumino/css/styles-' + $rootScope.theme + '.css',
		'css/style-' + $rootScope.theme + '.css',
		'css/vitadb-' + $rootScope.theme + '.css',
	]);
	
	$scope.field = ''
	$scope.cat_filter = "0"
	$scope.updates = []
	$scope.views = []
	$scope.views.push([])
	$scope.views.push([])
	$scope.views.push([])
	$scope.views.push([])
	$scope.views.push([])
	$scope.views.push([])
	$scope.views.push([])
	$scope.views.push([])

	$http.get('list_hbs_json.php')
	.then(
		function(res){
			$scope.brews = res.data
			for (i=0;i<res.data.length;i++){
				$scope.brews[i].authors = $scope.brews[i].author.split(" & ")
				switch (Number(res.data[i].type)){
					case 1:
						$scope.brews[i].genre = "Original Game"
						break;
					case 2:
						$scope.brews[i].genre = "Game Port"
						break;
					case 4:
						$scope.brews[i].genre = "Utility"
						break;
					case 5:
						$scope.brews[i].genre = "Emulator"
						break;
					default:
						$scope.brews[i].genre = "Unknown"
						break;
				}
				$scope.views[Number(res.data[i].type)].push($scope.brews[i])
			}
			$scope.views[0] = $scope.brews
		}
		,function(e){
			console.log(e);
		}
	);
	
	$http.get('get_last_updates.php')
	.then(function(res){
		$scope.updates = res.data;
	}
	,function(e){
		console.log(e);
	});
	
	$scope.goTop = function(){
		$location.hash('top');
		$anchorScroll();
	}
	
	$scope.changeView = function () {
		$scope.brews = $scope.views[Number($scope.cat_filter)]
    }
	
	// Angular filter
	$scope.filterBrews = function(val){
		return function(brew){
			if (val == undefined) return true;
			return brew.author.toLowerCase().indexOf(val.toLowerCase() || '') !== -1 || brew.name.toLowerCase().indexOf(val.toLowerCase() || '') !== -1 || brew.description.toLowerCase().indexOf(val.toLowerCase() || '') !== -1;
		}
	}
	
})