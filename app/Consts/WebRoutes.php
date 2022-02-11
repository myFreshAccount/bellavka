<?php

namespace App\Consts;

class WebRoutes
{
    //auth
    const SHOW_LOGIN_FORM = 'auth_login_show';
    const LOGOUT = 'auth.logout';
    const LOGIN = 'auth_login';

    //task book
    const SHOW_ALL_TASKS = 'tasks_show_all_task';
    const SHOW_CREATE_TASK_FORM = 'tasks_show_create_task_form';
    const CREATE_TASK = 'tasks_create_task';
    const SHOW_UPDATE_TASK_FORM = 'tasks_show_update_task_form';
    const UPDATE_TASK = 'tasks_update_task';

}
