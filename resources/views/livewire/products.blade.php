<div>
    <form wire:submit.prevent="submit">
        <label for="">Name</label>
        <input type="text" wire:model='name'>
        <br><br>
        <label for="">Email</label>
        <input type="email" wire:model="email">
        <br><br>
        <input type="submit" value="Submit">
    </form>
</div>
