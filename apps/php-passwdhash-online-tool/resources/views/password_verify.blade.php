@extends('function-page')

@section('title') password_verify @endsection

@section('header') password_verify @endsection

@section('header-small') Verifies that a password matches a hash @endsection

@section('function') boolean password_verify ( string $password , string $hash ) @endsection

@section('url') https://php.net/manual/function.password-verify.php @endsection

@section('sub-content')
    <div class="alert alert-danger" style="display: none" id="differing-count-alert">
        <button type="button" class="close" aria-label="Close" id="differing-count-alert-close-button">
            <span aria-hidden="true">&times;</span>
        </button>
        count($passwords) !== count($hashes)
    </div>
    <form method="post" id="password-verify-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="passwords-textarea">Passwords, 1 per line</label>
                    <textarea rows="10" name="passwords" id="passwords-textarea" class="form-control code-input"
                    @if (!$displayResults) autofocus @endif
                            >{{ implode("\n", $passwords) }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="hashes-textarea">Hashes, 1 per line</label>
                    <textarea rows="10" name="hashes" id="hashes-textarea" class="form-control code-input" required
                            >{{ implode("\n", $hashes) }}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <button type="button" class="btn btn-default pull-right full-width" id="clear-button">Clear</button>
            </div>
            <div class="col-xs-8">
                <button type="submit" class="btn btn-primary pull-right full-width" id="verify-button">Verify</button>
            </div>
        </div>
        {{--<button type="submit" class="btn btn-primary pull-right" id="verify-button">Verify</button>--}}
        {{--<button type="button" class="btn btn-default pull-right" id="clear-button">Clear</button>--}}
        {{--<div class="clearfix"></div>--}}
        @if ($displayResults)
            <hr/>
            <div class="alert @if ($resultCount === $okCount) alert-success @elseif ($okCount === 0) alert-danger @else alert-warning @endif " id="result-alert">
                <strong>Result: {{ $okCount }}/{{ $resultCount }} OK</strong>
            </div>
            <div class="table-responsive">
                <table class="table table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th class="min-width">Status</th>
                        <th>Password</th>
                        <th>Hash</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $result)
                        <tr @if ($result['ok']) class="success" @else class="danger" @endif>
                            <td>@if ($result['ok']) OK @else Failed @endif</td>
                            <td><code class="code-reset-colors">{{ $result['password'] }}</code></td>
                            <td><code class="code-reset-colors">{{ $result['hash'] }}</code></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </form>
@endsection
