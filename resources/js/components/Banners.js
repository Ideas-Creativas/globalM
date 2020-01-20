import React from 'react';
import ReactDOM from 'react-dom';
import Slider from "react-slick";
import axios from 'axios';
//import imageUrl from '/public/images/banners/banner.jpg';

class Banners extends React.Component {
  constructor(props) {
    super(props);
    //Reemplazar por los archivos que esten en la carpeta banners
    this.state = {
      banners: ['OlHdOqvcOp-portada-facebook.png', 'OlHdOqvcOp-portada-facebook.png', 'OlHdOqvcOp-portada-facebook.png'],
    };
   // this.handleChange = this.handleChange.bind(this);
   // this.handleSubmit = this.handleSubmit.bind(this);
  }

  componentDidMount(){

  }
  render() {
    const { banners } = this.state;
    return (
      <Slider
        speed={500}
        slidesToShow={1}
        slidesToScroll={1}
        infinite={true}
        dots={true}
      >
  {/*<page>{banners}</page>*/}
       {banners.map(banner => (
          <page><img src={"../images/banners/"+banner}/></page>
       ))}
      </Slider>
    );
  }
}

ReactDOM.render(
  <Banners />,
  document.getElementById('slider')
);

