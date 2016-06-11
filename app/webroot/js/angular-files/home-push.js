tourpalsApp.controller('homePushCtrl', function($scope){
		$scope.loadOne = function(attrId){
			var _self = angular.element('#'+attrId);
			var placeCaption = _self.next('p[class^=option]');
			console.log(_self.attr('src')+'\n');
			console.log(placeCaption.text()+'\n');
		};
});
/*
tourpalsApp.directive('loginBtn', function(){
    return {
        restrict: 'C',
        scope: {
            href: "@href"
        },
        bindToController: true,
        controllerAs: "$ctrl",
        controller: function(){

        },
        link: function(scope, el, attrs){
            el.on('click', function(e){
                console.log(attrs.href);
                var _modal= $('#login-registration-modal');
                _modal.modal('show');
                e.preventDefault();
            });
        }
    };
});
*/