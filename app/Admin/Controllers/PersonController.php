<?php

namespace App\Admin\Controllers;

use App\Models\Person;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PersonController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header(trans('admin.index'))
            ->description(trans('admin.description'))
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header(trans('admin.detail'))
            ->description(trans('admin.description'))
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header(trans('admin.edit'))
            ->description(trans('admin.description'))
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header(trans('admin.create'))
            ->description(trans('admin.description'))
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Person);


        $grid->nome('nome');
        $grid->razao_social('razao_social');
        $grid->email('email');
        $grid->cidade('cidade');
        $grid->uf('uf');
        $grid->cep('cep');
        $grid->endereco('endereco');
        $grid->bairro('bairro');
        $grid->numero('numero');
        $grid->complemento('complemento');
        $grid->cpf_cnpj('cpf_cnpj');
        $grid->ddd('ddd');
        $grid->fone('fone');
        $grid->data_cadastro('data_cadastro');


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
        $show = new Show(Person::findOrFail($id));

        $show->id('ID');
        $show->nome('nome');
        $show->razao_social('razao_social');
        $show->email('email');
        $show->cidade('cidade');
        $show->uf('uf');
        $show->cep('cep');
        $show->endereco('endereco');
        $show->bairro('bairro');
        $show->numero('numero');
        $show->complemento('complemento');
        $show->cpf_cnpj('cpf_cnpj');
        $show->ddd('ddd');
        $show->fone('fone');
        $show->data_cadastro('data_cadastro');
        $show->created_at(trans('admin.created_at'));
        $show->updated_at(trans('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Person);
        $form->text('nome', 'nome')->rules('required',['required' => 'Campo obrigatório']);
        $form->text('razao_social', 'razao_social')->rules('required',['required' => 'Campo obrigatório']);
        $form->email('email', 'email')->rules('required',['required' => 'Campo obrigatório']);
        $form->text('cidade', 'cidade')->rules('required',['required' => 'Campo obrigatório']);
        $form->text('uf', 'uf')->rules('required|max:2',['required' => 'Campo obrigatório','max' => 'Campo UF deve conter apenas dois caracteres']);
        $form->number('cep', 'cep')->rules('required|max:8',['required' => 'Campo obrigatório','max'=>'CEP não pode ser maior do que oito caracteres']);
        $form->text('endereco', 'endereco')->rules('required',['required' => 'Campo obrigatório']);
        $form->text('bairro', 'bairro')->rules('required',['required' => 'Campo obrigatório']);
        $form->number('numero', 'numero')->rules('required',['required' => 'Campo obrigatório']);
        $form->text('complemento', 'complemento')->rules('required',['required' => 'Campo obrigatório']);
        $form->number('cpf_cnpj', 'cpf_cnpj')->rules('required',['required' => 'Campo obrigatório']);
        $form->number('ddd', 'ddd')->rules('required|max:3',['required' => 'Campo obrigatório','max'=>'DDD não pode ser maior do que três digitos']);
        $form->number('fone', 'fone')->rules('required',['required' => 'Campo obrigatório']);
        $form->date('data_cadastro', 'data_cadastro')->rules('required',['required' => 'Campo obrigatório']);

        return $form;
    }
}
