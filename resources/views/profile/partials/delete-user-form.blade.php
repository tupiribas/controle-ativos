<form method="POST" action="{{ route('profile.destroy') }}">
    @csrf
    @method('DELETE')

    <x-danger-button>
        {{ __('Delete Account') }}
    </x-danger-button>
</form>
