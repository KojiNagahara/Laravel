            @extends('layouts.app')

            @section('content')
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header">ユーザプロファイル作成</div>

                                <div class="card-body">
                                    <form method="POST" action="/profile" class="form-horizontal">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label" for="nickname">ニックネーム</label>
                                            <input type="text" name="nickname" placeholder="システム内で識別に使用される名前" class="col-md-8">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="avatar_filename">アバター用画像ファイル</label>
                                            <input type="text" name="avatar_filename" placeholder="アバター用画像ファイル" class="col-md-8" value="NoImage.png" readonly>
                                        </div>
                                        <div class="accordion" id="skillSettings" role="tablist" aria-multiselectable="true">
                                            <label class="control-label">スキル設定</label>
                                        @foreach($categories as $index => $category)
                                        <div class="card">
                                            <div class="card-header" role="tab" id="heading-{{ $index }}">
                                                <h5 class="mb-0">
                                                    <a class="text-body" data-toggle="collapse" href="#collapse-{{ $index }}" role="button" aria-expanded="true" aria-controls="collapse-{{ $index }}">
                                                        {{ $category->name }}
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse-{{ $index }}" class="collapse" role="tabpanel" aria-labelledby="heading-{{ $index }}" data-parent="#skillSettings">
                                                <div class="card-body">
                                                    @foreach($category->skills as $skill)
                                                        <div class="form-group">
                                                            <label class="control-label" for="skill-{{ $skill->id }}">{{ $skill->name }}</label>
                                                            <select class="form-control" name="skillLevel[{{ $skill->id }}]" id="skill-{{ $skill->id }}">
                                                                @foreach($category->answers as $index => $answer)
                                                                    @if($index === 0)
                                                                        <option value="{{ $answer->level }}" selected>{{ $answer->level }} - {{ $answer->description }}</option>
                                                                    @else
                                                                        <option value="{{ $answer->level }}">{{ $answer->level }} - {{ $answer->description }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        </div>
                                        <div class="form-group">
                                           <button type="submit" class="btn btn-primary">追加</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
