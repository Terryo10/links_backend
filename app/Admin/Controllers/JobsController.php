<?php

namespace App\Admin\Controllers;

use App\Models\Expertise;
use App\Models\Job;
use App\Models\Organisation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class JobsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Job';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Job());

        $grid->column('id', __('Id'));
        $grid->column('organisation_id', __('Organisation id'));
        $grid->column('name', __('Name'));
        $grid->column('type', __('Type'));
        $grid->column('expertises_id', __('Expertises id'));
        $grid->column('description', __('Description'));
        $grid->column('tasks', __('Tasks'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Job::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('organisation_id', __('Organisation id'));
        $show->field('name', __('Name'));
        $show->field('type', __('Type'));
        $show->field('expertises_id', __('Expertises id'));
        $show->field('description', __('Description'));
        $show->field('tasks', __('Tasks'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Job());
        $form->select('organisation_id', __('Select Organisation '))->options(Organisation::all()->pluck('name', 'id'));
        $form->text('name', __('Name'));
        $form->text('type', __('Type'));
        $form->select('expertises_id', __('Select Expertises '))->options(Expertise::all()->pluck('name', 'id'));
        $form->textarea('description', __('Description'));
        $form->textarea('tasks', __('Tasks'));

        return $form;
    }
}
