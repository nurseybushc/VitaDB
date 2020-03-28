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

	var TypeGenre = {1:"Original Game", 2:"Game Port", 4:"Utility", 5: "Emulator"};

	$http.get('list_hbs_json.php')
	.then(
		function(res){
			$scope.brews = res.data
			for (i=0;i<res.data.length;++i){
				var brew = $scope.brews[i];
				brew.authors = brew.author.split(" & ");
				
				var brewType = parseInt(brew.type);
				var brewGenre = TypeGenre[brewType];

				brew.genre = brewGenre ? brewGenre : "Unknown";
				$scope.views[brewType].push(brew);
			}
			$scope.views[0] = $scope.brews;
		}
		,function(e){
			console.error(e);
		}
	);
	
	$http.get('get_last_updates.php')
	.then(function(res){
		$scope.updates = res.data;
	}
	,function(e){
		console.error(e);
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