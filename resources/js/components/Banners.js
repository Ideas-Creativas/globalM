import React from 'react';
import ReactDOM from 'react-dom';
import Slider from "react-slick";
import axios from 'axios';

class Banners extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      banners: ['OlHdOqvcOp-portada-facebook.png', 'OlHdOqvcOp-portada-facebook.png', 'OlHdOqvcOp-portada-facebook.png'],
    };
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
        autoplay={true}
        autoplaySpeed={7000}
      >
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

