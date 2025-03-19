<?php
require_once 'models/Dashboard.php';

class DashboardController {
    public function index() {
        $DashboardModel = new Dashboard();
        $dashboard = $DashboardModel->getDashboard();
        require 'views/dashboard/index.php';
    }

    
}
