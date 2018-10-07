var roleApp = angular.module('roleApp', ['ngRoute'])
    .constant('__env', __env)
    .config(['$interpolateProvider', '$routeProvider', function ($interpolateProvider, $routeProvider) {
        var baseUrl = __env.baseUrl + "/angularjs/role/";
        $interpolateProvider
            .startSymbol("[[")
            .endSymbol("]]");
        $routeProvider
            .when('/add-staff', {
                templateUrl: baseUrl + 'templates/AddStaff.html',
                controller: "AddStaffController",
                activetab: "nhanviens",
                resolve: {
                    roles: function (RoleData) {
                        return RoleData.getRoles();
                    }
                }
            })
            .when('/', {
                templateUrl: baseUrl + "templates/StaffList.html",
                controller: "StaffListController",
                activetab: 'nhanviens',
                resolve: {
                    bases: function (StaffData) {
                        return StaffData.getBases();
                    },
                    staffs: function (StaffData) {
                        return StaffData.getStaffs();
                    },
                    roles: function (RoleData) {
                        return RoleData.getRoles();
                    }
                }
            })
            .when('/chuc-vu', {
                templateUrl: baseUrl + "templates/RoleList.html",
                controller: 'RoleListController',
                activetab: 'chucvus',
                resolve: {
                    roles: function (RoleData) {
                        return RoleData.getRoles();
                    }
                }
            })
            .when('/role/:roleId', {
                templateUrl: baseUrl + "templates/EditRole.html",
                controller: "RoleEditController",
                activetab: 'chucvus',
                resolve: {
                    data: function (RoleData, $route) {
                        return RoleData.getRole($route.current.params.roleId);
                    }
                }
            })
            .when('/new-role', {
                templateUrl: baseUrl + "templates/EditRole.html",
                controller: "RoleEditController",
                activetab: 'chucvus',
                resolve: {
                    tabs: function (TabData) {
                        return TabData.getTabs();
                    }
                }
            })
            .otherwise({redirectTo: '/'});
    }]);