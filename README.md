# Sistema de Agendamento

Este é um sistema de agendamento desenvolvido para gerenciar usuários, serviços, categorias, horários e reservas. Abaixo está a descrição das tabelas do banco de dados e suas respectivas estruturas.

## Banco de Dados

### Tabelas

#### Users
- **Id** (Identificador único do usuário)
- **Name** (Nome do usuário)
- **Email** (E-mail do usuário)
- **Password** (Senha do usuário)
- **Phone** (Telefone do usuário)
- **IsAdmin** (Indica se o usuário é um administrador)
- **Created_at** (Data de criação do registro)
- **Updated_at** (Data de atualização do registro)
- **Deleted_at** (Data de exclusão do registro, se aplicável)

#### Categories
- **Id** (Identificador único da categoria)
- **Name** (Nome da categoria)
- **Description** (Descrição da categoria)
- **Created_at** (Data de criação do registro)
- **Updated_at** (Data de atualização do registro)
- **Deleted_at** (Data de exclusão do registro, se aplicável)

#### Services
- **Id** (Identificador único do serviço)
- **Name** (Nome do serviço)
- **Description** (Descrição do serviço)
- **Price** (Preço do serviço)
- **Duration** (Duração do serviço)
- **category_id** (Chave estrangeira referenciando a categoria do serviço)
- **Created_at** (Data de criação do registro)
- **Updated_at** (Data de atualização do registro)
- **Deleted_at** (Data de exclusão do registro, se aplicável)

#### Booking_status
- **Id** (Identificador único do status da reserva)
- **Name** (Nome do status)
- **Description** (Descrição do status)
- **Valores** (Valores possíveis para o status):
    - 1, Pending, Pending booking
    - 2, Accept, Accept Booking
    - 3, Refused, Refused booking
    - 4, Cancelled, Cancelled Booking

#### Hours
- **Id** (Identificador único do horário)
- **Hour** (Horário disponível)
- **available** (Indica se o horário está disponível)
- **Day** (Dia do horário)
- **Created_at** (Data de criação do registro)
- **Updated_at** (Data de atualização do registro)
- **Deleted_at** (Data de exclusão do registro, se aplicável)

#### Bookings
- **Id** (Identificador único da reserva)
- **Total_price** (Preço total da reserva)
- **total_duration** (Duração total da reserva)
- **Booking_status_id** (Chave estrangeira referenciando o status da reserva)
- **Notes** (Notas adicionais sobre a reserva)
- **User_id** (Chave estrangeira referenciando o usuário que fez a reserva)
- **Created_at** (Data de criação do registro)
- **Updated_at** (Data de atualização do registro)
- **Deleted_at** (Data de exclusão do registro, se aplicável)

#### Booking_services
- **Booking_id** (Chave estrangeira referenciando a reserva)
- **Service_id** (Chave estrangeira referenciando o serviço)
- **Hour_id** (Chave estrangeira referenciando o horário)
- **Price** (Preço do serviço na reserva)
- **Duration** (Duração do serviço na reserva)
- **Created_at** (Data de criação do registro)
- **Updated_at** (Data de atualização do registro)
- **Deleted_at** (Data de exclusão do registro, se aplicável)


## Casos de Uso

### Reserva

#### Criar reserva
- **Descrição**: O usuário cria uma nova reserva
- **Pré-condições**: O usuário deve estar autenticado
- **Pós-condições**: Uma nova reserva é criada no sistema
- **Fluxo principal**:
    1. O usuário seleciona os serviços que deseja reservar
    2. O usuário seleciona o horário da reserva
    3. O usuário confirma a reserva
    4. O sistema calcula o preço total e a duração total da reserva
    5. O sistema cria a reserva no banco de dados
    6. O sistema atualiza a disponibilidade do horário selecionado
    7. O sistema cria os registros de serviços na reserva
    8. O sistema envia um e-mail solicitando confirmação para o administrador
    9. O sistema envia um e-mail de notificação para o usuário avisando que teve sucesso na reserva

#### Cancelar reserva pelo usuário
- **Descrição**: O usuário cancela uma reserva existente
- **Pré-condições**: O usuário deve estar autenticado
- **Pós-condições**: A reserva é cancelada no sistema
- **Fluxo principal**:
    1. O usuário acessa a lista de reservas
    2. O usuário seleciona a reserva que deseja cancelar
    3. O usuário solicita o cancelamento da reserva
    4. O sistema atualiza o status da reserva para "Cancelada"
    5. O sistema atualiza a disponibilidade do horário da reserva
    6. O sistema envia um e-mail de notificação para o administrador avisando que a reserva foi cancelada
    7. O sistema envia um e-mail de notificação para o usuário avisando que a reserva foi cancelada

#### Cancelar reserva pelo administrador
- **Descrição**: O administrador cancela uma reserva existente
- **Pré-condições**: O usuário deve estar autenticado e ser um administrador
- **Pós-condições**: A reserva é cancelada no sistema
- **Fluxo principal**:
    1. O administrador acessa a lista de reservas
    2. O administrador seleciona a reserva que deseja cancelar
    3. O administrador solicita o cancelamento da reserva
    4. O sistema atualiza o status da reserva para "Cancelada"
    5. O sistema atualiza a disponibilidade do horário da reserva
    6. O sistema envia um e-mail de notificação para o administrador avisando que a reserva foi cancelada
    7. O sistema envia um e-mail de notificação para o usuário avisando que a reserva foi cancelada
