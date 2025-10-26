<?php

namespace App\Enums;

enum ChannelPhone: int
{
    case FIJO = "fijo";
    case WHATSAPP = "whatsapp";
    case TELEGRAM = "telegram";

    public function label() {
        return match($this) {
            self::FIJO => "Llamada fija",
            self::WHATSAPP => "Whatapp",
            self::TELEGRAM => "Telegram"
        };
    }
};
