tourpalsApp.controller('homePushCtrl', function($scope){
		$scope.loadOne = function(attrId){
			var _self = angular.element('#'+attrId);
			var placeCaption = _self.next('p[class^=option]');
			console.log(_self.attr('src')+'\n');
			console.log(placeCaption.text()+'\n');
		};
});