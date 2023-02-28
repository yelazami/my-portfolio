import React from 'react';
import { BsTwitter, BsInstagram } from 'react-icons/bs';
import { FaLinkedinIn } from 'react-icons/fa';

const SocialMedia = () => (
  <div className="app__social">
    <div>
      <a href="https://www.linkedin.com/in/yassine-el-azami/" target='_blank'>
        <FaLinkedinIn />
      </a>
    </div>
    <div>
      <a href="https://twitter.com/YassineElAZAMI1" target='_blank'>
        <BsTwitter />
      </a>
    </div>
    <div>
      <a href="https://www.instagram.com/l_azami_yassine_/" target='_blank'>
        <BsInstagram />
      </a>
    </div>
  </div>
);

export default SocialMedia;