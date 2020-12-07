<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyArticleTagRequest;
use App\Http\Requests\StoreArticleTagRequest;
use App\Http\Requests\UpdateArticleTagRequest;
use App\Models\ArticleTag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleTagsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('article_tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articleTags = ArticleTag::all();

        return view('admin.articleTags.index', compact('articleTags'));
    }

    public function create()
    {
        abort_if(Gate::denies('article_tag_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.articleTags.create');
    }

    public function store(StoreArticleTagRequest $request)
    {
        $articleTag = ArticleTag::create($request->all());

        return redirect()->route('admin.article-tags.index');
    }

    public function edit(ArticleTag $articleTag)
    {
        abort_if(Gate::denies('article_tag_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.articleTags.edit', compact('articleTag'));
    }

    public function update(UpdateArticleTagRequest $request, ArticleTag $articleTag)
    {
        $articleTag->update($request->all());

        return redirect()->route('admin.article-tags.index');
    }

    public function show(ArticleTag $articleTag)
    {
        abort_if(Gate::denies('article_tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.articleTags.show', compact('articleTag'));
    }

    public function destroy(ArticleTag $articleTag)
    {
        abort_if(Gate::denies('article_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articleTag->delete();

        return back();
    }

    public function massDestroy(MassDestroyArticleTagRequest $request)
    {
        ArticleTag::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
