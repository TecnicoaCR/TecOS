@extends('function-page')

@section('title') password_needs_rehash @endsection

@section('header') password_needs_rehash @endsection

@section('header-small') Checks if the given hash matches the given options @endsection

@section('function') boolean password_needs_rehash ( string $hash , integer $algo [, array $options ] ) @endsection

@section('url') https://php.net/manual/function.password-needs-rehash.php @endsection

@section('sub-content')
    <form method="post" id="password-needs-rehash-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="hashes-textarea">Hashes, 1 per line</label>
                    <textarea rows="10" name="hashes" id="hashes-textarea" class="form-control code-input" required
                    @if (!$displayResults) autofocus @endif
                            >{{ implode("\n", $hashes) }}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="algo-select">Algo</label>
                    <select id="algo-select" class="form-control code-input" name="algo">
                        <option value="{{ PASSWORD_BCRYPT }}" @if (PASSWORD_BCRYPT === $algo) selected @endif >
                            PASSWORD_BCRYPT === PASSWORD_DEFAULT
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cost-input">Cost</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <label class="sr-only" for="use-cost-checkbox">Use cost</label>
                            <input type="checkbox" name="useCost" id="use-cost-checkbox"
                            @if ($useCost) checked @endif/>
                        </span>
                        <input name="cost" id="cost-input" placeholder="10" class="form-control code-input" required
                               value="{{ $cost }}" @if (!$useCost) disabled @endif type="number" min="4" max="31"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <button type="button" class="btn btn-default pull-right full-width" id="clear-button">Clear</button>
            </div>
            <div class="col-xs-8">
                <button type="submit" class="btn btn-primary pull-right full-width" id="hash-button">Check</button>
            </div>
        </div>
    </form>
    @if ($displayResults)
        <hr/>
        <table class="table table-condensed table-bordered">
            <thead>
            <tr>
                <th>Needs Rehash</th>
                <th>Hash</th>
            </tr>
            </thead>
            <tbody>
            @foreach($results as $result)
                <tr @if ($result['needsRehash']) class="warning" @else class="success" @endif >
                    <td>@if ($result['needsRehash']) Yes @else No @endif</td>
                    <td>{{ $result['hash'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
