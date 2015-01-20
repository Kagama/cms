<h1>Заявка на регистрацию от <?=$participant->brand_name?> от <?=date('d/m/Y', $participant->reg_date)?></h1>
<br />
<p><strong>Участвовать в семинаре:</strong> <?=$participant->seminar ? "Да" : "Нет"?></p>
<p><strong>Название брэнда:</strong> <?=$participant->brand_name?></p>
<p><strong>Имя:</strong> <?=$participant->first_name?></p>
<p><strong>Фамилия:</strong> <?=$participant->last_name?></p>
<p><strong>Должность:</strong> <?=$participant->job?></p>
<p><strong>Номер телефона:</strong> <?=$participant->phone?></p>
<p><strong>Электронная почта:</strong> <?=$participant->email?></p>
<br />
