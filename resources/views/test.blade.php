
<?php $names = ['Amira','Emad','Mohamed']; ?>
@foreach ($names as $name)
    <p>This is user {{ $name }}</p>
@endforeach
