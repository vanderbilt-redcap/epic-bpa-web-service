<?php

// TODO - We need some kind of security to verify that this POST came from Epic.

$data = file_get_contents("php://input");
$module->log($module::DATA_POSTED_MESSAGE, [
    data => $data
]);

?>
<CDSAdvisory>
  <ShowAlert>true</ShowAlert>
  <DisplayText>This is test response from &lt;a href="<?=APP_PATH_WEBROOT_FULL?>"&gt;<?=APP_PATH_WEBROOT_FULL?>&lt;/a&gt;.</DisplayText>
  <FollowUp>
    <WebLink>
      <Title>Test WebLink</Title>
      <URL><?=APP_PATH_WEBROOT_FULL?></URL>
    </WebLink>
  </FollowUp>
</CDSAdvisory>