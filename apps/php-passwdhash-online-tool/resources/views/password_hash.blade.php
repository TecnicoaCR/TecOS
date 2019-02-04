@extends('function-page')

@section('title') password_hash @endsection

@section('header') password_hash @endsection

@section('header-small') Creates a password hash @endsection

@section('function') string password_hash ( string $password , integer $algo [, array $options ] ) @endsection

@section('url') https://php.net/manual/function.password-hash.php @endsection

@section('sub-content')
    <form method="post" id="password-hash-form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="passwords-textarea">Passwords, 1 per line</label>
                    <textarea rows="10" name="passwords" id="passwords-textarea" class="form-control code-input"
                              @if (!$displayResults) autofocus @endif
                            >{{ implode("\n", $passwords) }}</textarea>
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
                    <label for="salt-input">Salt</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <label class="sr-only" for="use-salt-checkbox">Use salt</label>
                            <input type="checkbox" name="useSalt" id="use-salt-checkbox"
                                   @if ($useSalt) checked @endif/>
                        </span>
                        <input name="salt" id="salt-input" @if (!$useSalt) placeholder="Auto-generated" disabled @endif
                               class="form-control @if ($useSalt || $salt != '') code-input @endif " pattern=".{22,}"
                               value="{{ $salt }}" type="text" required title="Minimum 22 characters" minlength="22"/>
                    </div>
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
                <button type="submit" class="btn btn-primary pull-right full-width" id="hash-button">Hash</button>
            </div>
        </div>
        <hr/>
        <div class="form-group">
            <label for="hashes-textarea">Hashes</label>
            <textarea rows="10" id="hashes-textarea" @if ($displayResults) autofocus @endif
                      class="form-control code-input @if ($displayResults) select-all @endif" readonly
                    >{{ implode("\n", $hashes) }}</textarea>
        </div>
    </form>
@endsection