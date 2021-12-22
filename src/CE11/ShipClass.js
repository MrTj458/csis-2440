class Ship {
  name
  speed
  hardPoints
  cargo
  cost
  image

  constructor(name, speed, hardPoints, cargo, cost, image) {
    this.name = name
    this.speed = speed
    this.hardPoints = hardPoints
    this.cargo = cargo
    this.cost = cost
    this.image = image
  }

  displayShip(display) {
    display.innerHTML = ""
    let displayString = `
      <table>
        <tr>
          <td>Name</td>
          <td>${this.name}</td>
        </tr>
        <tr>
          <td>Speed</td>
          <td>${this.speed}</td>
        </tr>
        <tr>
          <td>Hard Points</td>
          <td>${this.hardPoints}</td>
        </tr>
        <tr>
          <td>Cargo</td>
          <td>${this.cargo}</td>
        </tr>
        <tr>
          <td>Cost</td>
          <td>${this.cost}</td>
        </tr>
        <tr>
          <td><img src="imgs/${this.image}" /></td>
        </tr>
      </table>
    `
    display.innerHTML = displayString
  }
}
