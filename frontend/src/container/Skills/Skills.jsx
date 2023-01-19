import React, { useState, useEffect } from 'react';
import { motion } from 'framer-motion';
import ReactTooltip from 'react-tooltip';

import { AppWrap, MotionWrap } from '../../wrapper';
import { urlFor, api } from '../../client';
import './Skills.scss';

const Skills = () => {
  const [experiences, setExperiences] = useState([]);
  const [skills, setSkills] = useState([]);

  useEffect(() => {
    const query = '*[_type == "experiences"]';
    const skillsQuery = '*[_type == "skills"]';

    api('/experiences')
      .then(response => response.json())
      .then((data) => setExperiences(data))
      .catch(error => console.log(error))

    api('/skills')
    .then(response => response.json())
    .then((data) => setSkills(data))
    .catch(error => console.log(error))

  }, []);

  return (
    <>
      <h2 className="head-text">Skills & Experiences</h2>

      <div className="app__skills-container">
        <motion.div className="app__skills-list">
          {skills.map((skill) => (
            <motion.div
              whileInView={{ opacity: [0, 1] }}
              transition={{ duration: 0.5 }}
              className="app__skills-item app__flex"
              key={skill.name}
            >
              <div
                className="app__flex"
                style={{ backgroundColor: skill.bgColor }}
              >
                <img src={urlFor(skill.icon)} alt={skill.name} />
              </div>
              <p className="p-text">{skill.name}</p>
            </motion.div>
          ))}
        </motion.div>
        <div className="app__skills-exp">
          {experiences?.map((experience) => (
            <motion.div
              className="app__skills-exp-item"
              key={experience.period}
            >
              <div className="app__skills-exp-year">
                <p className="bold-text">{experience.period}</p>
              </div>
              <motion.div className="app__skills-exp-works">
                
                  <>
                    <motion.div
                      whileInView={{ opacity: [0, 1] }}
                      transition={{ duration: 0.5 }}
                      className="app__skills-exp-work"
                      data-tip
                      data-for={experience.name}
                      key={experience.name}
                    >
                      <h4 className="bold-text">{experience.name}</h4>
                      <p className="p-text">{experience.company}</p>
                    </motion.div>
                    <ReactTooltip
                      id={experience.name}
                      effect="solid"
                      arrowColor="#fff"
                      className="skills-tooltip"
                    >
                      <p dangerouslySetInnerHTML={{__html: experience.description}}></p>
                    </ReactTooltip>
                  </>

              </motion.div>
            </motion.div>
          ))}
        </div>
      </div>
    </>
  );
};

export default AppWrap(
  MotionWrap(Skills, 'app__skills'),
  'skills',
  'app__whitebg',
);