@extends('layouts.siswa')

@section('title', 'Mengerjakan Ujian')

@section('page-title', $ujian->nama_ujian)

@section('content')

<style>

    .exam-wrapper {
        max-width: 1100px;
        margin: 0 auto;
    }

    .exam-header {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        padding: 22px 25px;

        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 20px;
        margin-bottom: 20px;
    }

    .exam-title h2 {
        font-size: 20px;
        color: #172033;
    }

    .exam-title p {
        color: #64748b;
        font-size: 13px;
        margin-top: 5px;
    }

    .timer-box {
        background: #fff1f2;
        border: 1px solid #fecdd3;

        color: #be123c;

        padding: 12px 18px;
        border-radius: 12px;

        min-width: 140px;
        text-align: center;
    }

    .timer-label {
        display: block;
        font-size: 11px;
        margin-bottom: 3px;
        color: #9f1239;
    }

    .timer {
        font-size: 21px;
        font-weight: bold;
        letter-spacing: 1px;
    }

    .exam-layout {
        display: grid;
        grid-template-columns: 250px 1fr;
        gap: 20px;
    }

    .question-navigation {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        padding: 20px;

        height: fit-content;

        position: sticky;
        top: 95px;
    }

    .question-navigation h3 {
        font-size: 15px;
        margin-bottom: 5px;
    }

    .question-navigation p {
        font-size: 12px;
        color: #64748b;
        margin-bottom: 18px;
    }

    .number-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 8px;
    }

    .number-btn {
        height: 42px;

        border: 1px solid #e2e8f0;

        background: #f8fafc;

        border-radius: 9px;

        cursor: pointer;

        font-weight: bold;

        color: #475569;
    }

    .number-btn:hover {
        border-color: #173b6c;
    }

    .number-btn.active {
        background: #173b6c;
        color: white;
        border-color: #173b6c;
    }

    .number-btn.answered {
        background: #dcfce7;
        border-color: #86efac;
        color: #166534;
    }

    .question-card {
        background: white;

        border: 1px solid #e5e7eb;

        border-radius: 18px;

        padding: 28px;

        min-height: 430px;
    }

    .question-number {
        color: #173b6c;

        font-size: 13px;

        font-weight: bold;

        margin-bottom: 12px;
    }

    .question-text {
        font-size: 18px;

        line-height: 1.7;

        color: #172033;

        margin-bottom: 25px;
    }

    .answer-option {
        display: flex;

        align-items: flex-start;

        gap: 12px;

        padding: 15px;

        border: 1px solid #e2e8f0;

        border-radius: 12px;

        margin-bottom: 12px;

        cursor: pointer;

        transition: .2s;

        background: white;
    }

    .answer-option:hover {
        border-color: #93c5fd;

        background: #f8fbff;
    }

    .answer-option:has(input:checked) {
        border-color: #173b6c;

        background: #eff6ff;
    }

    .answer-option input {
        margin-top: 4px;
    }

    .answer-letter {
        font-weight: bold;

        min-width: 20px;
    }

    .question-actions {
        display: flex;

        justify-content: space-between;

        margin-top: 25px;

        padding-top: 20px;

        border-top: 1px solid #e5e7eb;
    }

    .btn-exam {
        border: none;

        padding: 11px 18px;

        border-radius: 9px;

        cursor: pointer;

        font-size: 13px;

        font-weight: bold;
    }

    .btn-prev {
        background: #f1f5f9;

        color: #475569;
    }

    .btn-next {
        background: #173b6c;

        color: white;
    }

    .btn-submit {
        background: #15803d;

        color: white;
    }

    .hidden-question {
        display: none;
    }

    @media(max-width: 800px) {

        .exam-layout {
            grid-template-columns: 1fr;
        }

        .question-navigation {
            position: static;
        }

        .number-grid {
            grid-template-columns: repeat(8, 1fr);
        }

    }

</style>


<div class="exam-wrapper">

    <!-- HEADER UJIAN -->

    <div class="exam-header">

        <div class="exam-title">

            <h2>
                {{ $ujian->nama_ujian }}
            </h2>

            <p>
                {{ $soals->count() }} soal
                •
                {{ $ujian->durasi }} menit
            </p>

        </div>


        <!-- TIMER -->

        <div class="timer-box">

            <span class="timer-label">
                Waktu Tersisa
            </span>

            <span
                class="timer"
                id="timer">

                --:--

            </span>

        </div>

    </div>


    <!-- FORM -->

    <form
        id="examForm"
        action="{{ route(
            'siswa.ujian.submit',
            $ujian
        ) }}"
        method="POST">

        @csrf


        <div class="exam-layout">


            <!-- SIDEBAR NOMOR SOAL -->

            <aside class="question-navigation">

                <h3>
                    Daftar Soal
                </h3>

                <p>
                    Klik nomor untuk berpindah soal
                </p>


                <div class="number-grid">

                    @foreach($soals as $index => $soal)

                        <button
                            type="button"

                            class="number-btn
                                {{ $index === 0
                                    ? 'active'
                                    : '' }}"

                            id="number-{{ $index }}"

                            onclick="
                                showQuestion({{ $index }})
                            ">

                            {{ $index + 1 }}

                        </button>

                    @endforeach

                </div>

            </aside>


            <!-- AREA SOAL -->

            <div>

                @foreach($soals as $index => $soal)

                    <div
                        class="
                            question-card
                            {{ $index !== 0
                                ? 'hidden-question'
                                : '' }}
                        "

                        data-question="{{ $index }}"
                    >

                        <div class="question-number">

                            SOAL
                            {{ $index + 1 }}

                            DARI
                            {{ $soals->count() }}

                        </div>


                        <div class="question-text">

                            {{ $soal->pertanyaan }}

                        </div>


                        <!-- A -->

                        <label class="answer-option">

                            <input
                                type="radio"

                                name="jawaban[{{ $soal->id }}]"

                                value="A"

                                onchange="
                                    markAnswered({{ $index }})
                                "
                            >

                            <span class="answer-letter">
                                A.
                            </span>

                            <span>
                                {{ $soal->pilihan_a }}
                            </span>

                        </label>


                        <!-- B -->

                        <label class="answer-option">

                            <input
                                type="radio"

                                name="jawaban[{{ $soal->id }}]"

                                value="B"

                                onchange="
                                    markAnswered({{ $index }})
                                "
                            >

                            <span class="answer-letter">
                                B.
                            </span>

                            <span>
                                {{ $soal->pilihan_b }}
                            </span>

                        </label>


                        <!-- C -->

                        <label class="answer-option">

                            <input
                                type="radio"

                                name="jawaban[{{ $soal->id }}]"

                                value="C"

                                onchange="
                                    markAnswered({{ $index }})
                                "
                            >

                            <span class="answer-letter">
                                C.
                            </span>

                            <span>
                                {{ $soal->pilihan_c }}
                            </span>

                        </label>


                        <!-- D -->

                        <label class="answer-option">

                            <input
                                type="radio"

                                name="jawaban[{{ $soal->id }}]"

                                value="D"

                                onchange="
                                    markAnswered({{ $index }})
                                "
                            >

                            <span class="answer-letter">
                                D.
                            </span>

                            <span>
                                {{ $soal->pilihan_d }}
                            </span>

                        </label>


                        <!-- NAVIGASI -->

                        <div class="question-actions">

                            @if($index > 0)

                                <button
                                    type="button"

                                    class="
                                        btn-exam
                                        btn-prev
                                    "

                                    onclick="
                                        showQuestion({{
                                            $index - 1
                                        }})
                                    ">

                                    ← Sebelumnya

                                </button>

                            @else

                                <div></div>

                            @endif


                            @if(
                                $index <
                                $soals->count() - 1
                            )

                                <button
                                    type="button"

                                    class="
                                        btn-exam
                                        btn-next
                                    "

                                    onclick="
                                        showQuestion({{
                                            $index + 1
                                        }})
                                    ">

                                    Berikutnya →

                                </button>

                            @else

                                <button
                                    type="button"

                                    class="
                                        btn-exam
                                        btn-submit
                                    "

                                    onclick="submitExam()">

                                    ✓ Kumpulkan Jawaban

                                </button>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </form>

</div>


<script>

/*
|--------------------------------------------------------------------------
| NAVIGASI SOAL
|--------------------------------------------------------------------------
*/

let currentQuestion = 0;

const questions =
    document.querySelectorAll(
        '.question-card'
    );

const numberButtons =
    document.querySelectorAll(
        '.number-btn'
    );


function showQuestion(index)
{
    if (
        index < 0 ||
        index >= questions.length
    ) {
        return;
    }


    questions.forEach(function(question) {

        question.classList.add(
            'hidden-question'
        );

    });


    numberButtons.forEach(function(button) {

        button.classList.remove(
            'active'
        );

    });


    questions[index]
        .classList
        .remove('hidden-question');


    numberButtons[index]
        .classList
        .add('active');


    currentQuestion = index;


    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}


/*
|--------------------------------------------------------------------------
| TANDAI SOAL YANG SUDAH DIJAWAB
|--------------------------------------------------------------------------
*/

function markAnswered(index)
{
    const button =
        document.getElementById(
            'number-' + index
        );

    button.classList.add(
        'answered'
    );
}


/*
|--------------------------------------------------------------------------
| SUBMIT
|--------------------------------------------------------------------------
*/

function submitExam()
{
    const yakin = confirm(
        'Apakah kamu yakin ingin mengumpulkan jawaban?'
    );


    if (yakin) {

        document
            .getElementById('examForm')
            .submit();

    }
}


/*
|--------------------------------------------------------------------------
| TIMER
|--------------------------------------------------------------------------
|
| Sisa waktu dikirim dari controller.
| Jadi refresh tidak mengembalikan timer
| ke durasi awal.
|
*/

let totalSeconds =
    {{ $sisaWaktu }};


const timerElement =
    document.getElementById('timer');


function updateTimer()
{
    const minutes =
        Math.floor(
            totalSeconds / 60
        );


    const seconds =
        totalSeconds % 60;


    timerElement.textContent =
        String(minutes).padStart(2, '0')
        + ':'
        + String(seconds).padStart(2, '0');


    /*
    |--------------------------------------------------------------------------
    | Peringatan 5 menit
    |--------------------------------------------------------------------------
    */

    if (totalSeconds <= 300) {

        timerElement.style.color =
            '#dc2626';

    }


    /*
    |--------------------------------------------------------------------------
    | Waktu habis
    |--------------------------------------------------------------------------
    */

    if (totalSeconds <= 0) {

        clearInterval(countdown);


        alert(
            'Waktu ujian telah habis. Jawaban akan dikumpulkan otomatis.'
        );


        document
            .getElementById('examForm')
            .submit();


        return;
    }


    totalSeconds--;
}


updateTimer();


const countdown =
    setInterval(
        updateTimer,
        1000
    );

</script>

@endsection