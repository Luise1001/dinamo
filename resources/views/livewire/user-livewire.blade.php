<div>
    <div class="p-2 m-2 card">
        <div class="border-bottom">
            <h6 class="text-primary-color">{{ $user->name }}</h6>
        </div>
        <div class="p-2 d-flex justify-content-between">
            <span>{{ $user->verified == true ? 'Verificado' : 'Verificar' }} </span>
            <label class="container-switch">
                <input wire:click="verified({{ $user->id }})" type="checkbox" class="toggle-switch"
                    {{ $user->verified == true ? 'checked' : '' }} value="1">
                <span class="slider"></span>
            </label>
        </div>
        <div class="p-2 d-flex justify-content-between">
            <span>{{ $user->banned == true ? 'Bloqueado' : 'Bloquear' }}</span>
            <label class="container-switch">
                <input wire:click="banned({{ $user->id }})" type="checkbox" class="toggle-switch"
                    {{ $user->banned == true ? 'checked' : '' }} value="1">
                <span class="slider"></span>
            </label>
        </div>
    </div>
</div>
