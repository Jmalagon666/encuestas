<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Encuesta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8fafc;
        }
        .diagnostico-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 2.5rem 2rem;
            margin-top: 3rem;
        }
        .pregunta-label {
            font-weight: 600;
        }
        .resultado {
            font-size: 1.5rem;
            font-weight: 700;
        }
        .btn-validar {
            background: #3835dc;
            border: none;
        }
        .btn-validar:hover {
            background: #3835dc;
        }
    </style>
</head>
<body>
<div class="container d-flex align-items-center justify-content-center min-vh-100" style="background: linear-gradient(135deg, #e0e7ff 0%, #f8fafc 100%);">
    <div class="diagnostico-card mx-auto shadow-lg" style="max-width: 800px;">
        <h2 class="text-center mb-4 py-3 px-2 rounded" style="background: #3835dc; color: #fff; font-weight: bold; letter-spacing: 1px; box-shadow: 0 2px 12px rgba(56,53,220,0.08);">
            Diagnóstico predictivo de lesiones cervicodorsales en teletrabajadores
        </h2>
        <form id="diagnosticoForm">
            @php
                $preguntas = [
                    "¿Realiza ejercicios de estiramientos/pausas activas durante su jornada laboral?",
                    "¿Cuánto tiempo pasa sentado de manera continua durante su jornada laboral sin levantarse?",
                    "¿Cuál es la posición habitual de su pantalla en relación con sus ojos mientras trabaja?",
                    "¿Cómo describe su postura durante la mayor parte de su jornada laboral?",
                    "¿Con qué frecuencia ajusta la posición de su silla o escritorio para mayor comodidad?",
                    "¿Utiliza iluminación adecuada en su espacio de trabajo para evitar posturas forzadas?",
                    "¿Siente tensión o rigidez en el cuello, hombros y espalda al final de su jornada laboral?",
                    "¿Con qué frecuencia ha presentado dolor de cuello en los últimos 3 meses?",
                    "¿Con qué frecuencia ha presentado dolor de espalda media (dorsal) en los últimos 3 meses?",
                    "¿Con qué frecuencia ha presentado dolor de hombros en los últimos 3 meses?",
                    "¿Con qué frecuencia ha presentado entumecimiento en brazos o manos en los últimos 3 meses?",
                    "¿Con qué frecuencia ha presentado dolor de cabeza relacionado con postura en los últimos 3 meses?"
                ];
                // Opciones y puntaje por pregunta
                $opciones = [
                    // Pregunta 1, 5, 6, 7, 8, 9, 10, 11, 12 (Frecuencia)
                    [
                        ["label" => "Nunca", "valor" => 0],
                        ["label" => "Ocasionalmente", "valor" => 1],
                        ["label" => "Frecuentemente", "valor" => 3],
                        ["label" => "Siempre", "valor" => 5],
                    ],
                    // Pregunta 2 (Tiempo sentado)
                    [
                        ["label" => "Menos de 1 hora", "valor" => 0],
                        ["label" => "1-2 horas", "valor" => 1],
                        ["label" => "2-3 horas", "valor" => 3],
                        ["label" => "Mas de 3 horas", "valor" => 5],
                    ],
                    // Pregunta 3 (Pantalla)
                    [
                        ["label" => "A la altura de los ojos", "valor" => 0],
                        ["label" => "Más abajo de los ojos", "valor" => 2],
                        ["label" => "Más arriba de los ojos", "valor" => 2],
                        ["label" => "No tengo conocimiento", "valor" => 3],
                    ],
                    // Pregunta 4 (Postura)
                    [
                        ["label" => "Recta y alineada", "valor" => 0],
                        ["label" => "Ligeramente encorvada", "valor" => 2],
                        ["label" => "Muy encorvada", "valor" => 4],
                        ["label" => "Inclinada hacia un lado", "valor" => 3],
                    ],
                    // Pregunta 5 (Frecuencia)
                    [
                        ["label" => "Nunca", "valor" => 0],
                        ["label" => "Ocasionalmente", "valor" => 1],
                        ["label" => "Frecuentemente", "valor" => 3],
                        ["label" => "Siempre", "valor" => 5],
                    ],
                    // Pregunta 6 (Frecuencia)
                    [
                        ["label" => "Nunca", "valor" => 0],
                        ["label" => "Ocasionalmente", "valor" => 1],
                        ["label" => "Frecuentemente", "valor" => 3],
                        ["label" => "Siempre", "valor" => 5],
                    ],
                    // Pregunta 7 (Frecuencia)
                    [
                        ["label" => "Nunca", "valor" => 0],
                        ["label" => "Ocasionalmente", "valor" => 1],
                        ["label" => "Frecuentemente", "valor" => 3],
                        ["label" => "Siempre", "valor" => 5],
                    ],
                    // Pregunta 8 (Frecuencia)
                    [
                        ["label" => "Nunca", "valor" => 0],
                        ["label" => "Ocasionalmente", "valor" => 1],
                        ["label" => "Frecuentemente", "valor" => 3],
                        ["label" => "Siempre", "valor" => 5],
                    ],
                    // Pregunta 9 (Frecuencia)
                    [
                        ["label" => "Nunca", "valor" => 0],
                        ["label" => "Ocasionalmente", "valor" => 1],
                        ["label" => "Frecuentemente", "valor" => 3],
                        ["label" => "Siempre", "valor" => 5],
                    ],
                    // Pregunta 10 (Frecuencia)
                    [
                        ["label" => "Nunca", "valor" => 0],
                        ["label" => "Ocasionalmente", "valor" => 1],
                        ["label" => "Frecuentemente", "valor" => 3],
                        ["label" => "Siempre", "valor" => 5],
                    ],
                    // Pregunta 11 (Frecuencia)
                    [
                        ["label" => "Nunca", "valor" => 0],
                        ["label" => "Ocasionalmente", "valor" => 1],
                        ["label" => "Frecuentemente", "valor" => 3],
                        ["label" => "Siempre", "valor" => 5],
                    ],
                    // Pregunta 12 (Frecuencia)
                    [
                        ["label" => "Nunca", "valor" => 0],
                        ["label" => "Ocasionalmente", "valor" => 1],
                        ["label" => "Frecuentemente", "valor" => 3],
                        ["label" => "Siempre", "valor" => 5],
                    ],
                ];
            @endphp

            @foreach($preguntas as $i => $pregunta)
                <div class="pregunta-box mb-4 p-3 rounded shadow-sm" style="background:#f4f6fb; border-left:5px solid #3835dc;">
                    <div class="mb-2">
                        <span class="badge bg-primary me-2" style="background:#3835dc;">{{ $i+1 }}</span>
                        <span class="pregunta-label" style="color:#3835dc;">{{ $pregunta }}</span>
                    </div>
                    <div class="row">
                        @foreach($opciones[$i] as $op)
                            <div class="col-12 col-md-6 col-lg-3 mb-2">
                                <div class="form-check form-check-inline w-100">
                                    <input class="form-check-input" type="radio" name="p{{ $i }}" value="{{ $op['valor'] }}" id="p{{ $i }}_{{ $op['label'] }}" required>
                                    <label class="form-check-label w-100 px-2 py-1 rounded" for="p{{ $i }}_{{ $op['label'] }}" style="background:#fff;border:1px solid #e0e3ed;">
                                        {{ $op['label'] }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <button type="button" onclick="validarDiagnostico()" class="btn btn-validar w-100 mt-3 text-white fw-bold py-2">Validar</button>
        </form>
        <div id="resultado" class="resultado text-center mt-4"></div>
    </div>
</div>

<!-- Modal Resultado -->
<div class="modal fade" id="resultadoModal" tabindex="-1" aria-labelledby="resultadoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-white" style="background-color: #3835dc;">
        <h5 class="modal-title" id="resultadoModalLabel">Resultado del Diagnóstico</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body text-center" id="modalResultadoContenido" style="font-size:1.5rem;font-weight:700;"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
function validarDiagnostico() {
    const total = {{ count($preguntas) }};
    let suma = 0;
    let incompletas = [];
    for (let i = 0; i < total; i++) {
        const radios = document.getElementsByName('p' + i);
        let valor = null;
        for (const radio of radios) {
            if (radio.checked) {
                valor = parseInt(radio.value);
                break;
            }
        }
        if (valor === null) {
            incompletas.push(i + 1);
        } else {
            suma += valor;
        }
    }

    if (incompletas.length > 0) {
        let mensaje = "Por favor responde todas las preguntas antes de validar.<br>Falta seleccionar opción en:";
        mensaje += "<ul style='text-align:left'>";
        incompletas.forEach(num => {
            mensaje += `<li>Pregunta ${num}</li>`;
        });
        mensaje += "</ul>";
        document.getElementById('modalResultadoContenido').innerHTML = mensaje;
        var resultadoModal = new bootstrap.Modal(document.getElementById('resultadoModal'));
        resultadoModal.show();
        return;
    }

    // Nivel de riesgo según puntaje
    let nivel = '';
    let recomendaciones = '';
    if (suma <= 15) {
        nivel = '<span class="badge bg-success">Bajo riesgo</span>';
        recomendaciones = `
            <div class="mt-3 ">
                <strong>Felicitaciones, tu espacio y hábitos laborales son adecuados para prevenir lesiones musculoesqueléticas.</strong><br>
                Sigue realizando pausas activas cada hora y manteniendo una postura adecuada.<br>
                Evalúa periódicamente tu espacio de trabajo para garantizar que siga siendo ergonómico.
            </div>
        `;
    } else if (suma <= 40) {
        nivel = '<span class="badge bg-warning text-dark">Riesgo moderado</span>';
        recomendaciones = `
            <div class="mt-3 ">
                <strong>Implementa pausas activas cada 30-45 minutos para reducir la tensión muscular.</strong><br>
                Ajusta la altura de tu pantalla a la altura de los ojos y utiliza una silla ergonómica.<br>
                Si es posible, alterna entre posiciones de pie y sentado durante tu jornada laboral.
            </div>
        `;
    } else {
        nivel = '<span class="badge bg-danger">Alto riesgo</span>';
        recomendaciones = `
            <div class="mt-3 ">
                <strong>Urgente: Evalúa y adapta tu espacio de trabajo para mejorar su ergonomía (silla, escritorio, monitor).</strong><br>
                Consulta a un especialista en ergonomía o fisioterapia para prevenir complicaciones.<br>
                Aumenta la frecuencia de tus pausas activas y asegúrate de mantener una postura alineada.
            </div>
        `;
    }
    // El máximo puntaje posible es 60
    const porcentaje = Math.round((suma / 60) * 100);
    let mensaje = `<span style="font-size:1rem;font-weight:400;">Suma total de puntos: ${suma} de 60</span><br>
        Nivel de riesgo: ${nivel}<br>
        ${recomendaciones}
    `;
    // Mostrar en el modal
    document.getElementById('modalResultadoContenido').innerHTML = mensaje;
    var resultadoModal = new bootstrap.Modal(document.getElementById('resultadoModal'));
    resultadoModal.show();
}

// Reiniciar el formulario al cerrar el modal SOLO si no hay preguntas incompletas
document.addEventListener('DOMContentLoaded', function() {
    var resultadoModal = document.getElementById('resultadoModal');
    resultadoModal.addEventListener('hidden.bs.modal', function () {
        // Solo reinicia si el mensaje NO contiene "Por favor responde todas las preguntas"
        var contenido = document.getElementById('modalResultadoContenido').innerHTML;
        if (!contenido.includes("Por favor responde todas las preguntas")) {
            document.getElementById('diagnosticoForm').reset();
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
