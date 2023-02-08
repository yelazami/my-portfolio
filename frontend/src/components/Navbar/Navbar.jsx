import React, { useState } from 'react';
import { HiMenuAlt4, HiX } from 'react-icons/hi';
import { motion } from 'framer-motion';
import { FaFileDownload } from 'react-icons/fa'

import { images } from '../../constants';
import cv_en from '../../assets/cv_en.pdf'
import cv_fr from '../../assets/cv_fr.pdf'

import './Navbar.scss';

const Navbar = () => {
  const [toggle, setToggle] = useState(false);
  const [showResume, setShowResume] = useState(false);


  return (
    <nav className="app__navbar">
      <div className="app__navbar-logo">
        <a href="#home">
            <img src={images.logo} alt="logo" />
        </a>
      </div>
      <ul className="app__navbar-links">
        {['home', 'about', 'work', 'skills', 'testimonial', 'contact'].map((item) => (
          <li className="app__flex p-text" key={`link-${item}`}>
            <div />
            <a href={`#${item}`}>{item}</a>
          </li>
        ))}
      </ul>

      <ul className='cv'>
        <li className="app__flex" key="link-cv">
              <div />
              <a onClick={() => setShowResume(!showResume)}> resume <FaFileDownload /> </a>
        </li>
      </ul>
      {showResume && 
        <div>
          <ul className='cv'>
            <li className="app__flex" key="link-cv">
                  <div />
                  <a href={cv_fr} download="CV_FR_Yassine_EL-AZAMI" onClick={() => setShowResume(!showResume)}> FR <FaFileDownload /> </a>
            </li>
          </ul>
          <ul className='cv'>
            <li className="app__flex" key="link-cv">
                  <div />
                  <a href={cv_en} download="CV_EN_Yassine_EL-AZAMI" onClick={() => setShowResume(!showResume)}> EN <FaFileDownload /> </a>
            </li>
          </ul>

        </div>
      }


      <div className="app__navbar-menu">
        <HiMenuAlt4 onClick={() => setToggle(true)} />

        {toggle && (
          <motion.div
            whileInView={{ x: [300, 0] }}
            transition={{ duration: 0.85, ease: 'easeOut' }}
          >
            <HiX onClick={() => setToggle(false)} />
            <ul>
              {['home', 'about', 'work', 'skills', 'testimonial', 'contact'].map((item) => (
                <li key={item}>
                  <a href={`#${item}`} onClick={() => setToggle(false)}>
                    {item}
                  </a>
                </li>
              ))}
            </ul>
          </motion.div>
        )}
      </div>
    </nav>
  );
};

export default Navbar;