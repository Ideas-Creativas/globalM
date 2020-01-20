import React from 'react';
import ReactDOM from 'react-dom';
import Slider from "react-slick";
import axios from 'axios';

class Motos extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      motos: ['OlHdOqvcOp-portada-facebook.png', 'OlHdOqvcOp-portada-facebook.png', 'OlHdOqvcOp-portada-facebook.png'],
    };
  }

  componentDidMount(){

  }
  render() {
    const { motos } = this.state;
    let i = 0;
    return (
      <div className="motos-container">
          {motos.map(moto => (
          <div key={i++}>
              <div key={i++}>
                <img src={"../images/banners/"+moto}/>
              </div>
              <div key={i++}>
                  <div key={i++}></div>
                  <div key={i++}></div>
              </div>
          </div>
       ))}
      </div>
    );
  }
}

ReactDOM.render(
  <Motos />,
  document.getElementById('motos')
);

