import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

class Menubarmotos extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      items: ['Deportivas', 'Enduro', 'Cuatriciclo'],
    };
  }

  componentDidMount(){

  }
  render() {
    const { items } = this.state;
    let i = 0;
    return (
          <ul className="menu-motos" key={i++}>
            <li key={i++}>Categoría</li>
            {items.map(item => (
                <li key={i++}>{item} - {i}</li>
            ))}
          </ul>
    );
  }
}

ReactDOM.render(
  <Menubarmotos />,
  document.getElementById('menubarmotos')
);

