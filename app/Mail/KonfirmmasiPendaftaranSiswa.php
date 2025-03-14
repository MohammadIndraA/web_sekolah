<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class KonfirmmasiPendaftaranSiswa extends Mailable
{
    use Queueable, SerializesModels;

    public $namaSiswa;
    public $detailPendaftaran;

    /**
     * Create a new message instance.
     */
    public function __construct($namaSiswa, $detailPendaftaran)
    {
        $this->namaSiswa = $namaSiswa;
        $this->detailPendaftaran = $detailPendaftaran;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Konfirmmasi Pendaftaran Siswa',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.konfirmasi_pendaftaran_siswa',
            with: [
                'name' => $this->namaSiswa,
                'details' => $this->detailPendaftaran,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
