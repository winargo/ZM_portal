<?php if (in_array($role,$this->session->userdata('pages')) || in_array($role.' Read Only',$this->session->userdata('pages'))): ?>
    <li><a href="/<?php echo $url !== '' ? $url : $role?>"><?php echo $name !== '' ? $name : $role?></a></li>
<?php endif; ?>