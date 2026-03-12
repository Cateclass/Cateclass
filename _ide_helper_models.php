<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $titulo
 * @property string $descricao
 * @property string|null $data_entrega
 * @property string $tipo
 * @property string $tipo_entrega
 * @property int $turma_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Resposta> $respostas
 * @property-read int|null $respostas_count
 * @property-read \App\Models\Turma $turma
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Atividade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Atividade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Atividade onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Atividade query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Atividade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Atividade whereDataEntrega($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Atividade whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Atividade whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Atividade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Atividade whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Atividade whereTipoEntrega($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Atividade whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Atividade whereTurmaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Atividade whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Atividade withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Atividade withoutTrashed()
 */
	class Atividade extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $titulo
 * @property string $descricao
 * @property string $data_publicacao
 * @property int $turma_id
 * @property int $autor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User $autor
 * @property-read \App\Models\Turma $turma
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aviso newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aviso newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aviso onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aviso query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aviso whereAutorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aviso whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aviso whereDataPublicacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aviso whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aviso whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aviso whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aviso whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aviso whereTurmaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aviso whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aviso withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Aviso withoutTrashed()
 */
	class Aviso extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $user_id
 * @property string|null $data_nascimento
 * @property string|null $escola
 * @property string|null $paroquia_origem
 * @property string|null $transferencia
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catequizando newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catequizando newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catequizando query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catequizando whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catequizando whereDataNascimento($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catequizando whereEscola($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catequizando whereParoquiaOrigem($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catequizando whereTransferencia($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catequizando whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Catequizando whereUserId($value)
 */
	class Catequizando extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nome_etapa
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Turma> $turmas
 * @property-read int|null $turmas_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etapa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etapa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etapa onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etapa query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etapa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etapa whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etapa whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etapa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etapa whereNomeEtapa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etapa whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etapa withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Etapa withoutTrashed()
 */
	class Etapa extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $texto
 * @property string $data_envio
 * @property string|null $comentario_catequista
 * @property int $catequizando_id
 * @property int $atividade_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Atividade $atividade
 * @property-read \App\Models\User $autor
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resposta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resposta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resposta onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resposta query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resposta whereAtividadeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resposta whereCatequizandoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resposta whereComentarioCatequista($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resposta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resposta whereDataEnvio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resposta whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resposta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resposta whereTexto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resposta whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resposta withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Resposta withoutTrashed()
 */
	class Resposta extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $tema
 * @property string $descricao
 * @property string $data_hora
 * @property string $local
 * @property string|null $publico_alvo
 * @property int $organizador_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\User $organizador
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reuniao newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reuniao newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reuniao query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reuniao whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reuniao whereDataHora($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reuniao whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reuniao whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reuniao whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reuniao whereLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reuniao whereOrganizadorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reuniao wherePublicoAlvo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reuniao whereTema($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reuniao whereUpdatedAt($value)
 */
	class Reuniao extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nome_turma
 * @property string $tipo_turma
 * @property string $data_inicio
 * @property string|null $data_termino
 * @property string|null $codigo_turma
 * @property int $etapa_id
 * @property int $catequista_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $alunos
 * @property-read int|null $alunos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Atividade> $atividades
 * @property-read int|null $atividades_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Aviso> $avisos
 * @property-read int|null $avisos_count
 * @property-read \App\Models\User $catequista
 * @property-read \App\Models\Etapa $etapa
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Turma newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Turma newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Turma onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Turma query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Turma whereCatequistaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Turma whereCodigoTurma($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Turma whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Turma whereDataInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Turma whereDataTermino($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Turma whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Turma whereEtapaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Turma whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Turma whereNomeTurma($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Turma whereTipoTurma($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Turma whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Turma withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Turma withoutTrashed()
 */
	class Turma extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $user_id
 * @property int $turma_id
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TurmaUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TurmaUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TurmaUser query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TurmaUser whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TurmaUser whereTurmaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TurmaUser whereUserId($value)
 */
	class TurmaUser extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $telefone
 * @property string|null $endereco
 * @property string $tipo_usuario
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Aviso> $avisos
 * @property-read int|null $avisos_count
 * @property-read \App\Models\Catequizando|null $catequizando
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Resposta> $respostas
 * @property-read int|null $respostas_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reuniao> $reunioes
 * @property-read int|null $reunioes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Turma> $turmasCursadas
 * @property-read int|null $turmas_cursadas_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Turma> $turmasGerenciadas
 * @property-read int|null $turmas_gerenciadas_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEndereco($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTelefone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTipoUsuario($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

