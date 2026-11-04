<?php

namespace App\Events;

use App\Models\Producto;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductoActualizado implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $producto;
    public $accion;

    public function __construct(Producto $producto, string $accion)
    {
        $this->producto = $producto;
        $this->accion = $accion;
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('inventario'),
        ];
    }
}