@extends('function-page')

@section('title') password_get_info @endsection

@section('header') password_get_info @endsection

@section('header-small') Returns information about the given hash @endsection

@section('function') array password_get_info ( string $hash ) @endsection

@section('url') https://php.net/manual/function.password-get-info.php @endsection

@section('sub-content')
    <form method="post" id="password-get-info-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="form-group">
            <label for="hashes-textarea">Hashes, 1 per line</label>
                    <textarea rows="10" name="hashes" id="hashes-textarea" class="form-control code-input" required
                    @if (!$displayResults) autofocus @endif
                            >{{ implode("\n", $hashes) }}</textarea>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <button type="button" class="btn btn-default pull-right full-width" id="clear-button">Clear</button>
            </div>
            <div class="col-xs-8">
                <button type="submit" class="btn btn-primary pull-right full-width" id="get-info-button">
                    Get Info
                </button>
            </div>
        </div>
    </form>
    @if ($displayResults)
        <hr/>
        <table class="table table-condensed table-bordered">
            <thead>
            <tr>
                <th>Hash</th>
                <th>Algo</th>
                <th>Algo Name</th>
                <th>Cost</th>
            </tr>
            </thead>
            <tbody>
            @foreach($results as $result)
                <tr @if ($result['algoName'] === 'unknown') class="danger" @endif >
                    <td>{{ $result['hash'] }}</td>
                    <td>{{ $result['algo'] }}</td>
                    <td>{{ $result['algoName'] }}</td>
                    <td>{{ array_get($result, 'cost', '-') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
